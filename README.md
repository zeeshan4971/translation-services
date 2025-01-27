Task 
Develop an API-driven service with the following features: 
Store translations for multiple locales (e.g., en , fr , es ) with the ability to add new languages in the future. 
Tag translations for context (e.g., mobile , desktop , web ). 
Expose endpoints to create, update, view, and search translations by tags, keys, or content. 
Provide a JSON export endpoint to supply translations for frontend applications like Vue.js. 
Json endpoint should always return updated translations whenever requested.



1) Install 
	Composer update
	php artisan migrate
	php artisan db:seed --> To Generate API User and Few Locals
    php artisan db:seed TranslationSeeder --> To Generate bulk 100k translations
	
3) Import Postman Api Doc

		Postman 
		/Login {{Token}}
			User : real@api.user
			pass : user@321!@#


		/api/locales GET | Post  --> Create and Get Locale
		/api/translations GET | Post  --> Create and get all translations
		/api/translations?tags=web   --> get translations by tag
		/api/translations/export --> Export Translation
		
		
		
4) Follow PSR-12 standards and use a scalable database schema.		

	A) Declare namespace first, followed by use statements, grouped and alphabetized.
	B) Use strict_types and class naming conventions.
	C) Use 4 spaces for indentation (no tabs).
	D) Soft limit: 80 characters per line. Hard limit: 120 characters.
	E) Add one space after control structure keywords and use curly braces even for single statements.
	F) Use type hints and return types.
	G) Only one class per file, and files should end with a blank line.
	H) Visibility is mandatory (public, private, protected).
