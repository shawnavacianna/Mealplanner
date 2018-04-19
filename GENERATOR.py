
import random
from faker import Faker

fake = Faker()

data=""
#things to note, an account can have multiple profiles.
#An account must have a profile in the same name

#Create accounts
plantypes=["basic","silver","gold"]
fnames=[]
lnames=[]

accIDs=1000000
for x in range(0,100000):
    account_id=str(accIDs + x)
    fname= fake.first_name()
    fnames+=[fname]
    lname= fake.last_name()
    lnames+=[lname]
    pword=fake.pystr(min_chars=8, max_chars=32)
    plantype= random.choice(plantypes)
    data+='INSERT INTO Account(account_id, fname,lname,pword,plantype) VALUES("%s", "%s", "%s", "%s", "%s");\n' % (account_id, fname, lname, pword, plantype)
print("accounts done")
#Create profiles: Requires account id

profIDs=1000000
for x in range(0,100000):
	account_id= str(accIDs+x)
	profile_id = str(profIDs+x)
	fname=fnames[x]
	lname=lnames[x]
	glutentolerant=str(fake.pybool())
	diabetic= str(fake.pybool())
	lactoseintolerant= str(fake.pybool())
	vegetarian = str(fake.pybool())
	vegan= str(fake.pybool())
	data+='INSERT INTO Profile(account_id,profile_id,fname,lname, glutentolerant, diabetic, lactoseintolerant, vegetarian, vegan) VALUES("%s","%s","%s","%s","%s","%s","%s","%s","%s");\n' % (account_id, profile_id, fname, lname, glutentolerant, diabetic, lactoseintolerant, vegetarian, vegan)
print("profiles done")

#Create Ingredients

ingredientLs=["flour","egg","milk","oil","herb","butter","salt","bread", "salmon","sugar",
				"corn","cheese","chocolate","lemon","rice","coconut","peanut","honey","beef","chicken",
				"tomato", "margarine","water","ackee","avocado","arrowroot", "prawns", "shark",
				"hilsa", "perch", "mussel", "flounder", "clams", "caramel", "pepper"]

units=["teaspoon","tablespoon","fl oz", "gill","cup","pint", "quart","gallon",
		"ml", "l", "pound", "ounce", "mg", "g", "kg"]

ingIDs=1000000
counter=0
for x in ingredientLs:
	ingredient_id = str(ingIDs+counter)
	name = random.choice(ingredientLs)
	data+='INSERT INTO Ingredients(ingredient_id, name) VALUES ("%s","%s");\n' % (ingredient_id,name)
	counter+=1
print("ingredients done")
#Create Recipe

time_units=["hrs", "mins", "secs"]
cal_num=[300, 450, 500, 600, 250, 450, 550, 700, 1000, 1500, 1250]

recipIDs=1000000
for x in range(0,500000):
	recipe_id = str(recipIDs+x)
	recipe_name = fake.pystr(min_chars=9, max_chars=50)
	creationdate= fake.date(pattern="%Y-%m-%d", end_datetime=None)
	calorie_count = random.choice(cal_num)
	prep_time = random.randrange(60)
	unit = str(random.choice(time_units))
	data+='INSERT INTO Recipe(recipe_id, recipe_name, creationdate, calorie_count, prep_time, unit) VALUES ("%s","%s","%s",%d,%d,"%s");\n' % (recipe_id, recipe_name, creationdate, calorie_count, prep_time, unit)
print("recipe done")

#create Meals
mealtypes= ["Breakfast", "Lunch", "Dinner"]
mealIDs=1000000
for x in range(0,500000):
	meal_id= str(mealIDs+x)
	meal_name = fake.pystr(min_chars=9, max_chars=50)
	last_served = fake.date(pattern="%Y-%m-%d", end_datetime=None)
	served_date = fake.date(pattern="%Y-%m-%d", end_datetime=None)
	meal_type = random.choice(mealtypes)
	images =fake.url(schemes=None)
	data+= 'INSERT INTO Meal(meal_id, meal_name, last_served, served_date, meal_type, images) VALUES("%s","%s","%s","%s","%s","%s");\n' % (meal_id, meal_name, last_served, served_date, meal_type, images)
print("meal done")


#Recipe instructions
insIDs=1000000
counter3=0
for x in range(0,500000):
	recipe_id= str(recipIDs+x)
	insNum=1
	for y in range(0,10):
		instruction_id = str(insIDs+y+counter3)
		instruction_number=insNum+x
		step = fake.pystr(min_chars=30, max_chars=75)
		data+= 'INSERT INTO Instruction(recipe_id, instruction_id, instruction_number, step) VALUES ("%s", "%s", %d, "%s");\n' % (recipe_id, instruction_id, instruction_number, step)
	counter3+=10
print("Instruction done")

#has_a
counter4=0
for x in range(0,500000):
	recipe_id = str(recipIDs+x)
	randomR= random.randrange(5,8)
	randList=random.sample(range(1000000,1000029), randomR)
	for y in randList:
		ingredient_id= str(y)
		amount = random.randrange(5, 50)
		unit= random.choice(units)
		data+= 'INSERT INTO has_a(recipe_id, ingredient_id, amount, unit) VALUES ("%s","%s",%d,"%s");\n' % (recipe_id, ingredient_id, amount, unit)
	counter4+=10
print("has_a done")

#adds
for y in range(0,100000):
	profile_id = profIDs+y
	for x in range(0,5):
		recipe_id= (recipIDs+x)+ (y*5) 
		data+= 'INSERT INTO adds(recipe_id, profile_id) VALUES ("%s", "%s");\n' %(recipe_id, profile_id)
print("adds done")

#uses
for x in range(0,500000):
	recipe_id = recipIDs+x
	meal_id= mealIDs+x
	data+= 'INSERT INTO uses(recipe_id, meal_id) VALUES ("%s","%s");\n' % (recipe_id, meal_id)
print("uses done")

#MealPlan
mealplancals= [2500,2000,3000,2750,2250,3500]
mids=1000000
for x in range(0,100000):
	mid = str(mids+x)
	meal_date = fake.date(pattern="%Y-%m-%d", end_datetime=None)
	calorie_count = random.choice(mealplancals)
	data+= 'INSERT INTO Mealplan(mid, meal_date, calorie_count) VALUES ("%s","%s",%d);\n' % (mid, meal_date, calorie_count) 
print("MealPlan done")

#SupermarketList

itemids= 1000000
counter2=0
for x in range(0,100000):
	mid = str(mids+x)
	for y in range(0,10):
		item_id = str(itemids+y+counter2)
		item_name = random.choice(ingredientLs)
		amount = random.randrange(1,10)
		unit = random.choice(units)
		data += 'INSERT INTO SupermarketList(mid,item_id,item_name, amount,unit) VALUES ("%s","%s","%s",%d,"%s");\n' % (mid, item_id, item_name, amount, unit)
	counter2+=10
print("SupermarketList done")

#generates

for x in range(0,100000):
	profile_id= str(profIDs+x)
	account_id= str(accIDs+x)
	mid= str(mids+x)
	data+='INSERT INTO generates(profile_id, account_id, mid) VALUES ("%s","%s","%s");\n' % (profile_id, account_id, mid)
print("generates done")

#madeupof
for x in range(0,100000):
	mid= str(mids+x)
	meal_id= str(mealIDs+x)
	data+= 'INSERT INTO madeupof(mid, meal_id) VALUES ("%s", "%s");\n' % (mid, meal_id)

print("madeupof done")

#hasInStock
choices=["True", "False"]
for x in range(0,100000):
	account_id=str(accIDs+x)
	profile_id=str(profIDs+x)
	for y in ingredientLs:
		ingredient_id= str(ingIDs+ingredientLs.index(y))
		status= random.choice(choices)
		data+= 'INSERT INTO hasInStock(account_id, profile_id, ingredient_id, status) VALUES ("%s","%s","%s","%s");\n' % (account_id, profile_id,ingredient_id, status)
print("hasInStock done")

file = open("generate.sql", "w")
file.write(data)
file.close()



#EACH PERSON WILL MAKE 5 RECIPES
