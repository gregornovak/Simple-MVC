# Simple MVC custom framework for learning purposes
This is a simple MVC framework for building web applications in PHP. You can use it for simple static pages or interact with the database which you can define in `.env` file which is defined in the root folder and then display results with twig templating engine.

Routing is done via `/controller/method/parameter`, example: `/users/show/5` - finds the `users` controller then it finds the method `show` and passes the `id` of the user to the method.