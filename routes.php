<?php

//To avoid direct access by URL (i.e. http://yoursite.com/Dribbble/shots/1234) remove this routing rule
Route::get('(:bundle)/(:any)/(:any)/(:num?)/(:num?)', function($method, $param, $page = 0, $per_page = 0)
{
	return Response::json(Dribbble::callMethod($method, $param, $page, $per_page));
});

?>
