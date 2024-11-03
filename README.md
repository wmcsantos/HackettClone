
# Hacket London Clone

This project aimed to clone an e-commerce website that sells clothing and accesories.

<img width="1470" alt="Screenshot 2024-11-03 at 13 33 15" src="https://github.com/user-attachments/assets/f932957f-8b55-47cc-8c86-d075960f42c9">
<img width="1470" alt="Screenshot 2024-11-03 at 13 37 27" src="https://github.com/user-attachments/assets/be997472-cf4f-4f5e-bbd4-ac5d54d855c2">

The project is focused on the backend functionality but the frontend was also developed to comprehensively implement all the backend functionalities.
<img width="1470" alt="Screenshot 2024-11-03 at 13 41 08" src="https://github.com/user-attachments/assets/084bad17-eeb3-4933-a0ff-46a978b9c21c">

The source code contains the frontoffice where the user can interact with the page to buy a specific project and it also contains the backoffice, where it is possible for an admin user to insert new products.
<img width="1470" alt="Screenshot 2024-11-03 at 14 37 13" src="https://github.com/user-attachments/assets/3f0d7473-88dd-437a-a79d-ad84fc700d4c">

## Functionalities Implemented

### Frontoffice

As for the functionalities already implemented in the frontoffice:

- Choose product category the user wants to navigate by hovering and clicking in the header;
- New user registration;
- User login;
- Browse store products;
- Add products to cart (only for logged-in users);
- Mandatory selection of product size;
- Option to choose different colors and sizes for a specific product;
- Add products to the cart;
- Option to update user account details (first name, last name, gender, email);
- Option to change account password;
- View all previous orders placed on the site;
- View products in the cart;
- Proceed to checkout;
- All forms have CSRF token implementation

### Backoffice

The functionalities implemented in the backoffice are:
- Login for users who are administrators;
- In the product section, option to add products;
- All routes are protected if the user has not logged in as an administrator

## Functionalities to implement

The functionalities that will be implemented during the next weeks are:

### Frontoffice

- Possibility to make an order and buy products without the need to be logged in;
- Possibility to add filters to visualize only certain products based on the product type, colour, size;
- Sort products according to the user's needs (sort by price, by colours);
- Add forgot password functionality

### Backoffice

- List all the products inserted in the system;
- Update products that are already inserted in the system;
- Delete products;
- Implement a dashboard where the admin can visualize the bussiness metrics of the store;
- List all the orders;
- Manage the orders;


## Stack used

**Front-end:** HTML, CSS, Javascript, TailwindCSS

**Back-end:** Plain PHP, MySQL

