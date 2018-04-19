import hashlib
import faker
from faker import Faker
fake = faker.Faker()
f = open("OnlineMealPlanner.sql","a")
def populate():

	for i in range(0,100000):
                f.write("INSERT INTO Account(account_id,fname,lname,pword) VALUES("+str(i+1000000)+","+'"'+fake.first_name()+'"'+","+'"'+fake.last_name()+'"'+","+'"'+hashlib.md5(fake.password()).hexdigest()+'"'+");") 
		f.write('\n')

	f.close()

populate()

