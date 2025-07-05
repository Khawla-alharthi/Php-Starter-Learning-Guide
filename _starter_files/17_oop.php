<?php
/*
 * PHP Object-Oriented Programming (OOP) for School Students
 * Imagine you want to build a game with different characters: a Wizard, a Knight, and an Archer.
 * Each character has things they own (like health, name, weapons) and things they can do (like attack, defend).
 * Instead of writing separate code for each character, Object-Oriented Programming (OOP) helps us organize our code
 * by creating 'blueprints' for these characters. These blueprints are called 'classes'.
 * From a 'class' blueprint, we can create many 'objects' (individual characters).
 */

// -------------------------------------------------------------------------------

// 1. What is a Class?
// A class is like a blueprint or a template for creating objects.
// It defines what properties (data) an object will have and what methods (actions) it can perform.

class Character {
  // Properties: These are like the characteristics or data that an object of this class will have.
  // `public` means these properties can be accessed from outside the class.
  public $name; // The character's name
  public $health; // The character's health points
  public $attackPower; // How strong the character's attack is

  // Constructor: This is a special method that runs automatically when you create a new object from the class.
  // It's used to set up the initial values for the object's properties.
  public function __construct($name, $health, $attackPower) {
    $this->name = $name; // `this` refers to the current object being created
    $this->health = $health;
    $this->attackPower = $attackPower;
    echo "<p>A new character, " . htmlspecialchars($this->name) . ", has been created!</p>";
  }

  // Methods: These are functions that belong to the class and define what an object can do.
  public function attack($target) {
    echo "<p>" . htmlspecialchars($this->name) . " attacks " . htmlspecialchars($target->name) . " for " . htmlspecialchars($this->attackPower) . " damage!</p>";
    $target->takeDamage($this->attackPower);
  }

  public function takeDamage($damage) {
    $this->health -= $damage;
    echo "<p>" . htmlspecialchars($this->name) . " takes " . htmlspecialchars($damage) . " damage. Health remaining: " . htmlspecialchars($this->health) . "</p>";
    if ($this->health <= 0) {
      echo "<p style='color: red;'>" . htmlspecialchars($this->name) . " has been defeated!</p>";
    }
  }

  // Destructor: This special method runs when an object is no longer needed or the script ends.
  // It's used for cleanup, like closing file connections.
  public function __destruct() {
    // echo "<p>" . htmlspecialchars($this->name) . " has left the game.</p>";
  }
}

// -------------------------------------------------------------------------------

// 2. Creating Objects (Instantiation):
// Once you have a class (blueprint), you can create many objects (actual characters) from it.
// This is called 'instantiation'.

echo "<h3>Creating Our Game Characters:</h3>";
$wizard = new Character("Gandalf", 100, 20); // Creating a Wizard object
$knight = new Character("Arthur", 150, 15); // Creating a Knight object

// You can access an object's properties using the `->` operator.
echo "<p>" . htmlspecialchars($wizard->name) . " has " . htmlspecialchars($wizard->health) . " health.</p>";
echo "<p>" . htmlspecialchars($knight->name) . " has " . htmlspecialchars($knight->attackPower) . " attack power.</p>";

// You can also call an object's methods.
echo "<h3>Let the Battle Begin!</h3>";
$wizard->attack($knight);
$knight->attack($wizard);

// -------------------------------------------------------------------------------

// 3. Inheritance:
// Imagine you want a special type of character, like a 'Healer'.
// A Healer is also a Character, but it has an extra ability: 'heal'.
// Instead of copying all the Character code, we can make Healer 'inherit' from Character.
// This means Healer gets all the properties and methods of Character, plus its own unique ones.

class Healer extends Character {
  public $healingPower; // A new property specific to Healers

  // When a child class (Healer) has its own constructor, it must call the parent's constructor.
  public function __construct($name, $health, $attackPower, $healingPower) {
    parent::__construct($name, $health, $attackPower); // Call the parent (Character) constructor
    $this->healingPower = $healingPower;
    echo "<p>A new Healer, " . htmlspecialchars($this->name) . ", has joined the team!</p>";
  }

  public function heal($target) {
    echo "<p>" . htmlspecialchars($this->name) . " heals " . htmlspecialchars($target->name) . " for " . htmlspecialchars($this->healingPower) . " health points!</p>";
    $target->health += $this->healingPower;
    echo "<p>" . htmlspecialchars($target->name) . "'s health is now: " . htmlspecialchars($target->health) . "</p>";
  }
}

echo "<h3>Introducing the Healer:</h3>";
$cleric = new Healer("Cleric Sarah", 80, 10, 30);

// The Healer can still attack because it inherited from Character.
$cleric->attack($knight);

// And it has its own special heal method.
$cleric->heal($wizard);

/*
 * Important things to remember about OOP:
 * - Classes are blueprints, objects are the actual things created from the blueprints.
 * - Properties are data, methods are actions.
 * - Constructors help set up new objects.
 * - Inheritance lets new classes reuse code from existing classes.
 * - OOP helps organize code, make it reusable, and easier to understand and manage.
 */

?>

