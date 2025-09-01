<?php

$contacts = [];
print_r($contact);

function addContact(array &$contacts, string $name, string $email, string $number): void
{
    $contacts[] = [
        "name" => $name,
        "email" => $email,
        "number" => $number
    ];
}

function displayInfo(array $contacts)
{
    if (empty($contacts))
    {
        echo "No contacts available";
    }
    else
    {
        foreach ($contacts as $contact)
        {
            echo "Name: {$contact["name"]},
            Email: {$contact["email"]},
            Phone: {$contact["number"]}\n";
        }
    }
}

while (true)
{
    echo "\n Contact management systems \n";
    echo "1. Add contact\n 2. View Contacts \n 3. Exit \n";

    $choice = (int)readline("Choice an option: ");

    if ($choice === 1)
    {
        $name = (string)readline("Enter your name: ");
        $email = (string)readline("Enter your email: ");
        $number = (int)readline("Enter your number: ");

        addContact($contacts, $name, $email, $number);

        echo "$name name added to contact \n";
        echo "$email email added to contact \n";
        echo "$number phone number added to contact \n";
    }
    else if ($choice === 2)
    {
        displayInfo($contacts);
    }
    else if ($choice === 3)
    {
        echo "Exiting.... \n";
        exit;
    }
    else 
    {
        echo "invalid choice. \n";
    }
}
