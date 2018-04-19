/**/create database OnlineMealPlanner;
use OnlineMealPlanner;

create table Account(
	account_id varchar(8) not null unique,
	fname varchar(15),
	lname varchar(15),
	pword char(32),
	plantype varchar(20),
	primary key(account_id)
);


create table Profile(
	account_id varchar(8) not null,
	profile_id varchar(8) not null unique,
	fname varchar(15),
	lname varchar(15),
	glutentolerant varchar(5),
	diabetic varchar(5),
	lactoseintolerant varchar(5),
	vegetarian varchar(5),
	vegan varchar(5),
	primary key(profile_id),
	foreign key(account_id) references Account(account_id) on delete cascade on update cascade
);


create table Recipe(
	recipe_id varchar(8) not null unique,
	recipe_name varchar(50),
	creationdate date,
	calorie_count int,
	prep_time int,
	unit varchar(10), #like minutes, hrs, etc
	primary key(recipe_id)
);


create table Ingredients(
	ingredient_id varchar(8) not null unique,
	name varchar(20),
	primary key(ingredient_id)
);


create table Mealplan(
	mid varchar(8) not null unique,
	meal_date date,
	calorie_count int,
	primary key(mid)
);


create table Meal(
	meal_id varchar(8) not null unique,
	meal_name varchar(50),
	last_served date,
	served_date date,
	meal_type varchar(10),
	images blob,
	primary key(meal_id)
);


create table Instruction(
	recipe_id varchar(8) not null,
	instruction_id varchar(8) not null unique,
	instruction_number int,
	step varchar(75),
	primary key(instruction_id),
	foreign key(recipe_id) references Recipe(recipe_id) on delete cascade on update cascade
);


create table SupermarketList(
	mid varchar(8) not null,
	item_id varchar(8) not null unique,
	item_name varchar(20),
	amount decimal,
	unit varchar(10),
	primary key(item_id),
	foreign key(mid) references Mealplan(mid) on delete cascade on update cascade
);

/*RELATIONSHIPS */
create table generates(
	profile_id varchar(8),
	account_id varchar(8),
	mid varchar(8),
	primary key(mid),
	foreign key(profile_id) references Profile(profile_id) on delete cascade on update cascade,
	foreign key(account_id) references Account(account_id) on delete cascade on update cascade,
	foreign key(mid) references Mealplan(mid) on delete cascade on update cascade
);


create table madeupof(
	mid varchar(8),
	meal_id varchar(8),
	primary key(meal_id), 
	foreign key(mid) references Mealplan(mid) on delete cascade on update cascade,
	foreign key(meal_id) references Meal(meal_id) on delete cascade on update cascade
);


create table has_a(
	recipe_id varchar(8),
	ingredient_id varchar(8),
	amount decimal,
	unit varchar(10),
	primary key(ingredient_id, recipe_id), 
	foreign key(recipe_id) references Recipe(recipe_id) on delete cascade on update cascade,
	foreign key(ingredient_id) references Ingredients(ingredient_id) on delete cascade on update cascade
);


create table adds(
	recipe_id varchar(8),
	profile_id varchar(8),
	primary key(recipe_id), 
	foreign key(recipe_id) references Recipe(recipe_id) on delete cascade on update cascade,
	foreign key(profile_id) references Profile(profile_id) on delete cascade on update cascade
);


create table uses(
	recipe_id varchar(8),
	meal_id varchar(8),
	primary key(recipe_id), 
	foreign key(recipe_id) references Recipe(recipe_id) on delete cascade on update cascade,
	foreign key(meal_id) references Meal(meal_id) on delete cascade on update cascade
);


create table hasInStock(
	account_id varchar(8),
	profile_id varchar(8),
	ingredient_id varchar(8),
	status varchar(5),
	primary key(profile_id,ingredient_id),
	foreign key(account_id) references Account(account_id) on delete cascade on update cascade,
	foreign key(ingredient_id) references Ingredients(ingredient_id) on delete cascade on update cascade,
	foreign key(profile_id) references Profile(profile_id) on delete cascade on update cascade
);
