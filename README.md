# Acme Widget Co Sales System

This is a simple PHP script for a sales system for Acme Widget Co. It includes a `Basket` class with methods to add items to the basket and calculate the total cost.

## How it works

The `Basket` class is initialized with a product catalogue, delivery charge rules, and special offers. The `add` method adds a product to the basket, and the `total` method calculates the total cost of the basket, taking into account the delivery and offer rules.

## Assumptions

- The product catalogue, delivery charge rules, and special offers are passed to the `Basket` class as arrays.
- The delivery charge rules are sorted in descending order by minimum order value.
- The special offers are represented as a dictionary where the key is the product code and the value is another dictionary with the keys 'buy' and 'get' representing the quantity to buy and the discount to get, respectively.
- The 'buy one red widget, get the second half price' offer is implemented as a special case in the `total` method. For a more general solution, a more sophisticated system for managing special offers would be needed.

To run the script, simply execute it with a PHP interpreter.

## License

This project is licensed under the MIT License.
