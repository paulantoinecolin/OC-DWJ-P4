// FRONT
// Route::get('/index') -> Application@process; Homepage => Liste des articles
// Route::get('/article/14') -> ArticleController@show; Vue d'un seul article et de ses commentaires
// Route::post('/article/14/insertcomment') -> CommentController@insert; Ajout d'un commentaire -> Redirect
// Route::get('/article/14/reportcomment') -> CommentController@report; signalement d'un commentaire -> Redirect

// BACK
// Route::get('/login') -> UserController@login; Page de login -> Redirect
// Route::get('/admin') -> Application@process; Dashboard => Liste des articles
// Route::get('/moderation') -> CommentController@show; Dashboard 2 => Liste des commentaires signalés
// Route::post('/article/14/edit') -> ArticleController@update; Edition d'un article -> Redirect
// Route::get('/article/14/delete') -> ArticleController@delete; Suppression d'un article -> Redirect
// Route::post('/article/14/insert') -> ArticleController@insert; Ajout d'un article -> Redirect
// Route::get('/article/14/moderatecomment') -> CommentController@moderate; annulation d'un signalement d'un commentaire -> Redirect
// Route::get('/article/14/deletecomment') -> CommentController@delete; Suppression d'un commentaire -> Redirect


