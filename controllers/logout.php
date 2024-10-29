<?php

// When logging out, destroy session
session_destroy();

// Redeirect user to the login area
header("Location: /login");