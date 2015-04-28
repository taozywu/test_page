<?php

/**
 * 分页
 * @param integer $page      当前页.
 * @param integer $pageCount 总页数.
 * @param integer $linkCount 页码连接数.
 * @param string  $url       Url.
 * 
 * @return string.
 */
function pageCreateNav($page, $pageCount, $linkCount, $url)
{
	// 下面三句摘自百度一个朋友的算法
    $start = max(1, $page - intval($linkCount / 2));
    $end = min($start + $linkCount - 1, $pageCount);
    $start = max(1, $end - $linkCount + 1);

    $result = "<ul>";

    if ($page <= 1) {
        $result .= '<li class="prev disabled"><a href="#"><i class="icon-double-angle-left"></i></a></li>';
    } else {
        $result .= '<li class="prev"><a href="' . $url . "&p=" . ($page - 1) . '"><i class="icon-double-angle-left"></i></a></li>';
    }
    for ($i = $start; $i <= $end; $i++) {
        if ($i == $page) {
            $result .= "<li class=\"active\"><a href=\"#\">" . $i . "</a></li>";
        } else {
            $result .= "<li><a href=\"" . $url . "&p=" . $i . "\">" . $i . "</a></li>";
        }
    }
    if ($page >= $pageCount) {
        $result .= '<li class="next disabled"><a href="#"><i class="icon-double-angle-right"></i></a></li>';
    } else {
        $result .= '<li class="next"><a href="' . $url . "&p=" . ($page + 1) . '"><i class="icon-double-angle-right"></i></a></li>';
    }

    $result .= "</ul>";

    return $result;
}

