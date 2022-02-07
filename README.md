# Course Registration

A educational portal for institutions made with [Yii](https://www.yiiframework.com/). It allows students to manages a whole range of activities such as course registration, results checking, timetable, accessing news, etc. 

The project is still in it's initial stages but many new additions are in the works and will be added over the next few months. Some of those change are listed [here](#future-features). 

## Accessing The Project

A demo version of the project is live on heroku. 

To login, you can use any of the following credentials: 

**Email: test@gmail.com, Password: test**

You can access it here: [Course Registration](http://course-reg.herokuapp.com/). 


## Concept
The idea behind this process is to make activities that student carry out on a day-to-day basis, easy, accessible and automated (if possible). 

Students should spend their time on important activities (such as learning, building projects, experimenting, etc) without having to worry about the "admin" side of being a student (keeping track of assignments, course registrations, exam dates, etc).

This project is geared to help students achieve that.

## Technology
This project is a monolithic web application created with PHP (using Yii framework) and data is managed with a MySQL database.

## Future Features
* Development of an admin panel where lecturers, head of departments and other school official can upload and manage student-related data for their students. 

* Online Testing Capabilities: In future versions of the platform, students will be able to create mock tests for themselves in preparation for exams. Any student can take any mock test created by another student, provided he is given access by the test creator. The administrator from the institution also has the ability to create test (mock or real) and grade students right from the platform. 

* Assignment Submission: Students will be able to submit assignment and get graded right on the platform. Their scores will automatically be added to their continuous assessment based on the score assignment plan set by the tutor. 

* Score Assessment Plan: This is essentially a plan detailing how a tutor wishes to awards his students grades. For example:

  * Week 1: Mock test (ungraded)
  * Week 2: Mock test (ungraded)
  * Week 3: Test (20%)
  * Week 4: Mock test (ungraded)
  * Week 5: Mock test (ungraded)
  * Week 6: Test (20%)
  * Week 7: Mock test (ungraded)
  * Week 8: Mock test (ungraded)
  * Week 9: Mock test (ungraded)
  * Week 10: Mock test (ungraded)
  * Week 11: Exams (60%) 

If the score assessment plan has been created, a tutor can link a test created on the platform to any week in the assessment plan, such that once the test is taken, student scores are automatically saved for that particular week, without the tutor having to do any manual labour.

* Transcript Collection: Students will be able to request for their transcript right on the platform. Once they initiate a "transcript request", the admins will be notified and a transcript would be sent to them via the platform. The platform also gives option for "transcript auto-generation". This would allow generation of unofficial transcripts easy for the admins. However signed transcripts still have to be uploaded directly to the platform.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Questions and Collaborations
If you have any questions regarding this project (or any other project) you can send me an email at [folaranmijesutofunmi[at]gmail.com](mailto:folaranmijesutofunmi@gmail.com) and I'll respond as soon as I can. 

## Other projects you might love
* [Real Estate API](https://github.com/mrfola/real-estate)
* [Job Scraper](https://github.com/mrfola/laravelJobScraper)
