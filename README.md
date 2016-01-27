Installation steps
1. Unzip the files.
2. Run them under web server(I tried under apache(localhost/register.php))

Idea
1. user can provide the useful information with clear feedback.
2.The form is simple and clear.
3. JavaScript is not used so that the users with javasacript turned off will be able to fully enjoy the site.

Limitation
1. The form could have been more responsive with javasacript and jquery.
2. The 
 
Status on Feature complete
The subject of this code challenge is to provide a single web page containing:
➔ a header	✔
➔ a footer	✔
➔ a registration form for some kind of service	✔
The implementation needs to satisfy the following requirements:
1. The form must contain the following fields
a. Full name (valid if present)	✔
b. Birthdate (valid if present and the date is in the right format)	✔
c. Address (valid if present)	✔
d. Nationality (valid if present, better if selected from a predefined set) ✔
e. email address (valid if present and formally correct)	✔
f. password and password confirmation (valid if present and if they match)	✔
g. checkbox to accept term and conditions (must be checked)	✔
h. a Submit button	✔
2. The form could also contain (nice to have)
a. an avatar image	✔
b. a graphical hint on how strong the password is	✔
c. the password cannot contain 3 consecutive numbers (like “foo123” or “foo789”)	✔
d. a check to let only register users that are 18+	✔
3. In case of one or more validation errors, the user should be warned in a nice way ✔
4. The design of the web page (included the form) must be responsive (with at least 3
breakpoints)	The concept is new to me and implemented at a point (the menu) 
5. The header must contain an image, a logo and some sort of navigation menu	✔
6. The design should be pleasant and modern	✔
7. The form is sent to a PHP script to perform the same validations that are in place in the
browser	✔

Bonus points
1. Loading the page the first time will present the user a disclaimer about the usage of
cookie. The user should be able to dismiss it	✔
2. The form is fully accessible (with ARIA) and usable with JavaScript disabled	✔
