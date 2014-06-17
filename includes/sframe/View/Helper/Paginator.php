<?php
/**
 * 分页
 *
 * @package View/Helper
 * @author fredyang
 * @version $Id$
 */
class SF_View_Helper_Paginator extends SF_View_Helper_Abstract
{
    // 总条数
    protected $_itemCount = 0;
    // 总页数
    protected $_pageCount = 1;
    // 每页数
    protected $_perPage = 20;
    // 当前页
    protected $_curPage = 1;
    // 显示页数
    protected $_pageRange = 12;
    // 最终分页
    protected $_pages = null;
    // 页面链接
    protected $_pageurl = '';

    /**
     * 分页传入相关参数
     *
     * @param int $page 当前页
     * @param int $count 总数
     * @param int $perPage 每页数
     * @param int $pageRange 显示页数
     */
    public function __construct($page, $count, $perPage = null, $pageRange = null)
    {
        if ($perPage) {
            $this->setPerPage($perPage);
        }
        if ($pageRange) {
            $this->setPageRange($pageRange);
        }
        $this->_itemCount = (int) $count;
        $this->_curPage = ($page < 1) ? 1 : (int) $page;
        $this->_pageCount = ceil($count / $this->_perPage);
    }
    
    /**
     * 设置链接
     */
    public function setPageurl($pageurl)
    {
        $this->_pageurl = $pageurl;
        return $this;
    }

    /**
     * 获取分页结果
     *
     * @param mixed $pageStyle
     * @return stdClass 分页结果类
     */
    public function getPages()
    {
        if (null === $this->_pages) {
            $this->_pages = $this->_createPages();
        }
        return $this->_pages;
    }

    /**
     * 获取组织好的html代码分页，样式自定义
     * 基本html分页样式，暂不作扩展，如有特殊页面显示需要可使用getPages自定义显示
     *
     * @return string 返回html
     */
    public function render()
    {
        $url = $this->_pageurl ? $this->_pageurl : getServer('REQUEST_URI');
        $part = explode('?', $url);
        if (isset($part[1])) {
            $part[1] = trim(preg_replace('/&?page=\d+/i', '', $part[1]), '&');
        }
        $url = $part[0] . '?' . (empty($part[1]) ? '' : $part[1] . '&');

        // 组织html
        $html = '';
        if ($this->getPageCount() > 1) {
            $page = $this->getPages();
            $html = '<div id="page">';
            $html .= '<div class="count">共'. $page->itemCount .'条记录， '. $page->curPage .'/'. $page->pageCount .'</div>';
            $html .= '<ul>';
            $html .= '<li class="first"><a href="' . $url . 'page=1">第一页</a></li>';
            if (isset($page->pre)) {
                $html .= '<li class="pre"><a href="' . $url . 'page=' . $page->pre . '">上一页</a></li>';
            }
            foreach ($page->ranges as $p) {
                $cur = ($p == $page->curPage) ? ' class="cur"' : '';
                $html .= '<li' . $cur . '><a href="' . $url . 'page=' . $p . '">' . $p . '</a></li>';
            }
            if (isset($page->next)) {
                $html .= '<li class="next"><a href="' . $url . 'page=' . $page->next . '">下一页</a></li>';
            }
            $html .= '<li class="last"><a href="' . $url . 'page=' . $page->pageCount . '">最后一页</a></li>';
            $html .= '</ul></div>';
        }
        
        return $html;
    }

    /**
     * 创建分页
     *
     * @param PaginatorInterface $pageStyle 分页计算类
     * @return object stdClass
     */
    protected function _createPages()
    {
        $pages = new stdClass();
        $pages->itemCount = $this->_itemCount;
        $pages->pageCount = $this->_pageCount;
        $pages->perPage = $this->_perPage;
        $pages->curPage = $this->_curPage;
        $pages->pageRange = $this->_pageRange;
        $pages->pageUrl = $this->_pageurl;
        // 上一页
        if ($pages->curPage > 1) {
            $pages->pre = $this->_curPage - 1;
        }
        // 下一页
        if ($pages->curPage < $this->_pageCount) {
            $pages->next = $this->_curPage + 1;
        }
        // 分布
        $pages->ranges = $this->_loadPageStyle();
        $pages->rangeFirst = empty($pages->ranges) ? 1 : min($pages->ranges);
        $pages->rangeLast = empty($pages->ranges) ? 1 : max($pages->ranges);
        return $pages;
    }

    /**
     * 分页基础分析
     *
     * 加载分页样式
     * 如无扩展算法，则加载默认分页算法
     * @return array
     */
    protected function _loadPageStyle()
    {
        $pageRange = $this->getPageRange();
        $pageNumber = $this->getCurPage();
        $pageCount = $this->getPageCount();
        if ($pageRange > $pageCount) {
            $pageRange = $pageCount;
        }
        $delta = ceil($pageRange / 2);
        if ($pageNumber - $delta > $pageCount - $pageRange) {
            $lowerBound = $pageCount - $pageRange + 1;
            $upperBound = $pageCount;
        } else {
            if ($pageNumber - $delta < 0) {
                $delta = $pageNumber;
            }
            $offset = $pageNumber - $delta;
            $lowerBound = $offset + 1;
            $upperBound = $offset + $pageRange;
        }
        $pages = array();
        for ($i = $lowerBound; $i <= $upperBound; $i++) {
            $pages[] = $i;
        }
        return $pages;
    }

    /**
     * 获取总条数
     * @return int
     */
    public function getItemCount()
    {
        return $this->_itemCount;
    }

    /**
     * 获取总页数
     * @return int
     */
    public function getPageCount()
    {
        return $this->_pageCount;
    }

    /**
     * 获取每页显示数
     * @return int
     */
    public function getPerPage()
    {
        return $this->_perPage;
    }

    /**
     * 获取当前页数
     * @return int
     */
    public function getCurPage()
    {
        return $this->_curPage;
    }

    /**
     * 获取每页显示页数
     * @return int
     */
    public function getPageRange()
    {
        return $this->_pageRange;
    }

    /**
     * 设置每页数
     * @param int $perPage
     */
    public function setPerPage($perPage)
    {
        $this->_perPage = (int)$perPage;
    }

    /**
     * 设置每页显示页数
     * @param int $pageRange
     */
    public function setPageRange($pageRange)
    {
        $this->_pageRange = (int)$pageRange;
    }
}
