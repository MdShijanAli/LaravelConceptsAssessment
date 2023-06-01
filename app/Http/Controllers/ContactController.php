<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');


        $to = 'shijan135@gmail.com.com';
        $subject = 'New contact form submission From My Laravel Assignment Project';
        $body = "Name: $name\nEmail: $email\nMessage: $message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {

            return response()->json(['message' => 'Contact form submitted successfully!']);
        } else {

            return response()->json(['message' => 'Failed to submit contact form. Please try again.'], 500);
        }
    }
}