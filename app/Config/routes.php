<?php

	Router::connect('/admin/users/:action', array('controller' => 'users','admin' => true));
	Router::connect('/admin', array('controller' => 'pages', 'action' => 'welcome', 'admin' => true));




	Router::connect('/admin/questionnaires/result/*', array('controller' => 'questionnaires', 'action' => 'result','admin' => true));
	Router::connect('/admin/questionnaires/resultview/*', array('controller' => 'questionnaires', 'action' => 'resultview','admin' => true));


	Router::connect('/admin/peoples', array('controller' => 'users', 'action' => 'peoples','admin' => true));
	Router::connect('/admin/peoples/edit/*', array('controller' => 'users', 'action' => 'peoples_edit','admin' => true));

	Router::connect('/admin/moderators', array('controller' => 'users', 'action' => 'moderators','admin' => true));
Router::connect('/admin/moderators/edit/*', array('controller' => 'users', 'action' => 'moderators_edit','admin' => true));
Router::connect('/admin/moderators/add', array('controller' => 'users', 'action' => 'moderators_add','admin' => true));

	Router::connect('/feedback', array('controller' => 'feedbacks', 'action' => 'index'));
	Router::connect('/page/*', array('controller' => 'pages', 'action' => 'index'));

	Router::connect('/news', array('controller' => 'news', 'action' => 'index'));
	Router::connect('/news/view/*', array('controller' => 'news', 'action' => 'view'));
	Router::connect('/questionnaires/*', array('controller' => 'questionnaires', 'action' => 'view'));
	Router::connect('/projects', array('controller' => 'projects', 'action' => 'index'));
	Router::connect('/projects/view/*', array('controller' => 'projects', 'action' => 'view'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));

	Router::connect('/contacts', array('controller' => 'pages', 'action' => 'contacts'));
	Router::connect('/registration_page', array('controller' => 'pages', 'action' => 'registration_page'));
	Router::connect('/partners', array('controller' => 'pages', 'action' => 'partners'));
	 Router::connect('/products/*', array('controller' => 'products', 'action' => 'view'));
	Router::connect('/about', array('controller' => 'pages', 'action' => 'about'));
	Router::connect('/chat', array('controller' => 'chats', 'action' => 'index'));
	Router::connect('/users/news', array('controller' => 'news', 'action' => 'news'));
	Router::connect('/users/news/view/*', array('controller' => 'news', 'action' => 'news_view'));
	Router::connect('/:language/users/forgetpwd/*', 
		array('controller' => 'users', 'action' => 'forgetpwd'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/registration', 
		array('controller' => 'users', 'action' => 'registration'),
		array('language' => '[a-z]{2}')
	);

	Router::connect('/:language/users/login', 
		array('controller' => 'users', 'action' => 'login'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/cabinet', 
		array('controller' => 'users', 'action' => 'cabinet'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/news', 
		array('controller' => 'news', 'action' => 'news'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/news/view/*', 
		array('controller' => 'news', 'action' => 'news_view'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/cabinet_edit', 
		array('controller' => 'users', 'action' => 'cabinet_edit'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/planned', 
		array('controller' => 'users', 'action' => 'planned'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/actual', 
		array('controller' => 'users', 'action' => 'actual'),
		array('language' => '[a-z]{2}')
	);
	

	
	Router::connect('/:language/users/my_questionnaires', 
		array('controller' => 'users', 'action' => 'my_questionnaires'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/moderator_questionnaires', 
		array('controller' => 'users', 'action' => 'moderator_questionnaires'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/my_question/*', 
		array('controller' => 'users', 'action' => 'my_question'),
		array('language' => '[a-z]{2}')
	);

	
	Router::connect('/:language/news', 
		array('controller' => 'news', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/documents', 
		array('controller' => 'documents', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/news/view/*', 
		array('controller' => 'news', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);

	Router::connect('/:language/projects', 
		array('controller' => 'projects', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/faqs', 
		array('controller' => 'faqs', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/vacancies', 
		array('controller' => 'vacancies', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/projects/view/*', 
		array('controller' => 'projects', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);

	Router::connect('/:language/albums', 
		array('controller' => 'albums', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/albums/*', 
		array('controller' => 'albums', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);

	Router::connect('/:language/page/*', 
		array('controller' => 'pages', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language', 
		array('controller' => 'pages', 'action' => 'home'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/products/*', 
		array('controller' => 'products', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/contacts', 
		array('controller' => 'pages', 'action' => 'contacts'),
		array('language' => '[a-z]{2}')
	);
	
	Router::connect('/:language/search', 
		array('controller' => 'search', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/partners', 
		array('controller' => 'pages', 'action' => 'partners'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/about', 
		array('controller' => 'pages', 'action' => 'about'),
		array('language' => '[a-z]{2}')
	);

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
