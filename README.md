# Lab Activity 13: Open the Front Door

## J1: HomeController compared to a resource controller

A resource controller's `index()` method usually reads from the database and passes a full list of records to a view, such as the movies list with search, filters, and pagination. It also sits behind a set of standard routes (create, store, show, edit, update, destroy) that Laravel generates automatically. My `HomeController` does neither: it only counts the movies and genres and returns the `home` view, and its single route is written by hand in `routes/web.php`.

## J2: Pagination links before withQueryString()

Before I added `withQueryString()`, the page links contained only the page number, such as `/movies?page=2`, so the search term and filters were dropped. When I clicked page 2, the controller received only the `page` value, so `$request->query('search')` returned nothing and the list showed every movie again. Adding `withQueryString()` made each link carry the existing search, genre, favorite, and sort values along with the page number.

## J3: Why a misspelled sort value is worse than an error

A misspelled sort value does not stop the page from loading, so nobody notices the sorting failed, and the list simply appears in no particular order. An error would at least tell me or a visitor that something is wrong, while this failure is silent. My allowed list, `['name', 'year']`, checks the sort value before it reaches `orderBy()`, and any value outside that list falls back to `name`.