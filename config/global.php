<?php

return [
	'contact_no' => '+91-987-657 3556',
	'email' => 'info@democracy.com',
	'company_address' => 'Andheri, Mumbai',
	'app_link' => 'https://google.com',
	'ios_link' => 'https://google.com',
	'SEND_CUSTOM_EMAIL' => TRUE,
	'EMAIL_FROM' => env('MAIL_FROM_ADDRESS', 'singharjun93124@gmail.com'),
	'EMAIL_FROM_NAME' => env('MAIL_FROM_NAME', 'Singh Arjun'),
	'EMAIL_TO' => ['ritesh.s.mypcot@gmail.com', 'ankita.s@mypcot.com', 'chhotelal.s@mypcot.com'],
	'base_path' => env('BASE_URL'),
	'meta_tags' => [
		"home" => [
			"canonical" => env('BASE_URL'),
			"title" => "Democracy Quiz App",
			"keywords" => "Democracy, Politics, Quiz, Knowledge, Voting, Citizens",
			"description" => "Immerse yourself in the world of democracy with our engaging quiz app. Test your knowledge, learn about political systems, and empower yourself as an informed citizen."
		],
		"faq" => [
			"canonical" => env('BASE_URL').'faq',
			"title" => "FAQs",
			"keywords" => "Democracy Quiz App, Questions, Answers, Support, Help",
			"description" => "Find answers to common questions about our Democracy Quiz App. Get support, guidance, and learn how to make the most out of your quiz experience."
		],
		"contact" => [
			"canonical" => env('BASE_URL').'contact',
			"title" => "Contact Us",
			"keywords" => "Democracy Quiz App, Contact, Get in touch, Feedback, Inquiries",
			"description" => "Have questions or feedback about our Democracy Quiz App? Feel free to reach out to us. We value your input and are here to assist you."
		],
		"privacy_policy" => [
			"canonical" => env('BASE_URL').'privacy',
			"title" => "Privacy & Policy",
			"keywords" => "Democracy Quiz App, Privacy, Policy, Data Protection, Confidentiality",
			"description" => "Protecting your privacy is our priority. Learn about our Privacy Policy to understand how we handle your data with care and respect."
        ],
		"terms_conditions" => [
			"canonical" => env('BASE_URL').'terms',
			"title" => "Terms & Conditions",
			"keywords" => "Democracy Quiz App, Agreement, Rights, Liability, Terms",
			"description" => "Review our Terms & Conditions to understand the guidelines for using our Democracy Quiz App. By accessing the app, you agree to abide by these terms."
		]

	]
];
?>