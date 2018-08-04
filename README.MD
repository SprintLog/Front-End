## Description
 This is a senior project . I have idea create  someting  about  Software Engineer  and  I discover  research [Use Case Points (UCP)](https://en.wikipedia.org/wiki/Use_Case_Points) so I create system send progress project for student with formula UCP estimate scope time in 1 semester


##  Role 
### Member
|  ชือ   |       Role    |
|---	                         |---            |---            |
|  Nantipat Tullwattaba       |  planning, see document ,design UI, control architect and development |
|     Sarawut Nawawisatkul      |     main development  (He made the most) |
|     Sutita Saraya      |     document (she cant waite code , she noob !) |
|    Kitsiri Chochiang      |     Advisor (help research  and planning project )|
## ＰＲＥＶＩＥＷ

![Alt text](/preview/1.png)

![Alt text](/preview/2.png)

![Alt text](/preview/3.png)

![Alt text](/preview/4.png)

![Alt text](/preview/5.png)

![Alt text](/preview/6.png)

![Alt text](/preview/relationshipDB.png)



##  How to install
make database name  sprintlog first or setup in .env file. 
```bash

# Install  dependencies
composer install 

# migration and seeder database
php artisan migrate:fresh --seed
```


## How to run
php artisan serve 



Your default web browser will be launched automatically with the url http://localhost:3000