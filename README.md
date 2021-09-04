Test
==============

In this test, I have tried to follow all requirements for business logic that were described in the task.
Also, I tried to keep such principles as 'SOLID', 'KISS', 'DRY', 'YAGNI'.
Here I see the space for improvement, but I hope the main idea will be understandable for the person who checks this test.
I've left some comments in the code which can help you to understand what I mean.

Also, I haven't done a few things like setting extras only for controllers,
because we don't have those restrictions in this task, but I guess it implies this.
As a result, we can add `television` as an extra for `microwave` for example
(In real life I would ask about it business person in the team or client).
More detailed information about it, you can find in comments in the code.

Also, I didn't use PHPDocs everywhere, because I think it is not necessary if you use strict type declaration,
but for places where it is good to be there, I left them.
Anyway, I think it depends on how the team decides (use PHPDocs everywhere or not).

If you have some questions, please contact me via email aleksanderlebedenko@gmail.com.

# Requirements

- PHP 8.0.8

# How to test

You can run the command from console
```bash
$ cd PATH_TO_THE_PROJECT

$ php index.php
```
or run it via browser if you have installed and configured webserver
(in this case, use viewing page by source to see formatted output).

# Tips
You can change inputs (prices and items) directly in `index.php` file.