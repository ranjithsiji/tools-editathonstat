<?php 

function get_quarry()
{
$quarry = 'select *
from page
where page_is_new=1 and page_namespace = 0 and page_is_redirect = 0
order by page_counter desc
limit 10';
return $quarry;
}