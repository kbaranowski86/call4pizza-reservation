ALTER TABLE  `meal_compositions` DROP  `ingredient_price` ;
ALTER TABLE  `ingredients` ADD  `price` FLOAT NOT NULL ;