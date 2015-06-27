<?php function vmacro_getUrlData($__p) { if (isset($__p[0])) { $page = $__p[0]; } else { if (isset($__p["page"])) { $page = $__p["page"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro getUrlData was called without parameter: page");  } } if (isset($__p[1])) { $urlData = $__p[1]; } else { if (isset($__p["urlData"])) { $urlData = $__p["urlData"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro getUrlData was called without parameter: urlData");  } }  ?><?php if ($page == 1) { ?><?php return $urlData; ?><?php } ?><?php $urlData = array('for' => $urlData['for'] . '_pages', 'page' => $page, 'alias' => (empty($urlData['alias']) ? ('') : ($urlData['alias'])), 'params' => (empty($urlData['params']) ? ('') : ($urlData['params'])), 'letter' => (empty($urlData['letter']) ? ('') : ($urlData['letter']))); ?><?php return $urlData; ?><?php } ?><?php if ($data->total_pages > 0) { ?><?php $dootedAfter = 2; ?><?php $minPage = ($data->current - $dootedAfter < $data->first ? $data->first : $data->current - $dootedAfter); ?><?php $maxPage = ($data->current + $dootedAfter > $data->last ? $data->last : $data->current + $dootedAfter); ?><nav class="pagination-block"><ul class="pagination"><?php if ($data->current != $data->first) { ?><li><a rel="prev" class="prev" href="<?php echo $this->url->get(vmacro_getUrlData(array($data->before, $url))); ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?php } ?><?php if ($data->current - $dootedAfter > $data->first) { ?><li><a href="<?php echo $this->url->get(vmacro_getUrlData(array($data->first, $url))); ?>"><?php echo $data->first; ?></a></li><?php } ?><?php if ($data->current - $dootedAfter - 1 > $data->first) { ?><li><span>...</span></li><?php } ?><?php $page = $minPage; ?><?php foreach (range($minPage, $maxPage) as $page) { ?><li  <?php if ($page == $data->current) { ?> rel="canonical" class="active"<?php } ?>><?php echo $this->tag->linkTo(array(vmacro_getUrlData(array($page, $url)), $page)); ?></li><?php $page = $page + 1; ?><?php } ?><?php if ($data->current + $dootedAfter < $data->last) { ?><?php if ($data->current + $dootedAfter + 1 < $data->last) { ?><li><span>...</span></li><?php } ?><li><?php echo $this->tag->linkTo(array(vmacro_getUrlData(array($data->last, $url)), $data->last)); ?><?php } ?></li><?php if ($data->current != $data->last) { ?><li><a rel="next" class="next" href="<?php echo $this->url->get(vmacro_getUrlData(array($data->next, $url))); ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?php } ?></ul></nav><?php } ?>