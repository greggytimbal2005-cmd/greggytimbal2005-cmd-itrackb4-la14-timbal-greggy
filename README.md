# Laboratory Activity 15: Deciding Who May

## F1. What two questions does my project answer now?

In Lab 14, I learned how to find out who a user is, using register, login, and logout. In this lesson, I learned how to decide what they are allowed to do. The `MoviePolicy` in `app/Policies/MoviePolicy.php` answers the question "What may you do?", while the `auth` middleware on the routes in `routes/web.php` still checks whether you are logged in.

## F2. Why could Tinker set `role` even though it isn't in `$fillable`?

`$fillable` only applies to mass assignment, which is passing a whole array to `create()`, `fill()`, or `update()`. When I typed `$u->role = 'admin'` and saved it myself, that didn't go through mass assignment, so nothing filtered it. The real purpose of `$fillable` is to stop a line like `Movie::create($request->all())` from saving a `role` value that came from anyone's form.

## F3. Why does a normal user get a 403, but a guest gets the login page?

A logged-in normal user passes the `auth` middleware because the app already knows who they are. When the request reaches `MovieController@create`, `Gate::authorize()` refuses it, and Laravel turns that refusal into a 403. A guest is stopped by the `auth` middleware before the controller runs, so Laravel redirects them to `route('login')`. The difference is intentional: the 403 says "I know who you are, and the answer is no," while the redirect says "I don't know you yet."

## F4. Why are index and show still public?

Anyone should be able to browse the catalogue, so `index` and `show` have no auth requirement. The `MoviePolicy` returns `true` for `viewAny()` and `view()`, and the `auth` middleware is attached only to `create`, `store`, `edit`, `update`, and `destroy` in `web.php`. This is a deliberate decision, and it's recorded in the policy file.

## F5. What goes wrong if the role check is written by hand in both the controller and the view?

If the same check is written twice, the two copies can drift apart. For example, if I change the controller to allow a new role but forget to update the view, the Add button could stay hidden even though the page would accept the request, or it could appear for someone who then gets a 403 when they click it. With the policy, there is one source for the rule. The `@can` directives in `index.blade.php` and the `Gate::authorize()` calls in `MovieController` both ask `MoviePolicy`, so they always give the same answer.

## F6. What does `SESSION_LIFETIME` count, and why was there no warning before I was logged out?

It counts idle time, meaning the time since my last request, not the total time I've been signed in. When I set it to 1, signed in, and waited more than a minute, my next click sent me to the login page. There was no warning because the server doesn't watch the session while nothing is happening. Laravel only checks whether the session has expired when the next request arrives. I set the value back to 120 and cleared the config cache afterward.