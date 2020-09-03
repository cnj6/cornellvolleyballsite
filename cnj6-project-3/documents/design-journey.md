# Project 3: Design Journey

Be clear and concise in your writing. Bullets points are encouraged.

**Everything, including images, must be visible in VS Code's Markdown Preview.** If it's not visible in Markdown Preview, then we won't grade it.

# Design & Plan (Milestone 1)

## Describe your Gallery (Milestone 1)
> What will your gallery be about? 1 sentence.
My photo gallery will be a collection of photos surrounding the Cornell volleyball team, including action shots, team events, alumni, recruiting, etc., to keep the whole program connected.

> Will you be using your existing Project 1 or Project 2 site for this project? If yes, which project?
Yes, project 1

> If using your existing Project 1 or Project 2, please upload sketches of your final design here.
![Contact Page](SketchContact2.jpg "Contact Page")
This was the coaches' contact page.

![Donations Page](SketchDonations.jpg "Donations Page")
This page had information on how to donate to the program


![Game and Events Schedule Page](SketchGESched2.jpg "Game and Events Schedule Page")
This page consisted of all the games as well as teh team events to keep alumni and fans connected


![Home Page](SketchHome2.jpg "Home Page")
This is the home page, also index.php. Contains a breif overview of the program.


![Outreach Page](SketchOutreach.jpg "Community Outreach Page")
This page included community outreach the team does. This is more aimed towars impressing alumni and donors


![Questionaire Confirmation](SketchQuestionaireConfirmation.jpg "Questionaire Confirmation")
This is what the user sees what they successfully submitted a valid recruiting questionaire.

![Questionaire Feedback](SketchQuestionaireFeedback.jpg "Questionaire Feedback")
These are the possible feedback statements when the user incorrectly submits the form. Only the improper inputs' feedback will be displayed. They will be displayed in red to distinguish from the rest of the form.

![Questionaire](SketchQuestionairePre.jpg "Questionaire")
This is at the bottom of the recruiting page. It looks like this before the user has submitted or attempted to submit the form.

![Recruiting Page](SketchRecruitingPage2.jpg "Recruiting Page")
This is what the top of the recruiting page looks like, and the questionaire is underneath.

![Recruiting Schedule Page](SketchRecruitingSched2.jpg "Recruiting Schedule Page")

## Target Audience(s) (Milestone 1)
> Tell us about your target audience(s).
My target audience is the Cornell volleyball program. This includes the current and former coaches and players, alumni, and fans.

## Design Process (Milestone 1)
> Document your design process. Show us the evolution of your design from your first idea (sketch) to design you wish to implement (sketch). Show us the process you used to organize content and plan the navigation (card sorting), if applicable.
> Label all images. All labels must be visible in VS Code's Markdown Preview.
> Clearly label the final design.

![Card sorting proj1](card_sorting_1.jpg "Card sorting after project 1")
This is the existing state of the website at the end of project 1. I need to add pages for the image gallery.

![Card sorting proj3](card_sorting_2.jpg "Card sorting beginning project 3")
I have decided to add a new page "Gallery" to the website that contains the image gallery. I have not changed anything else but am still considering whether I should delete/condense some of the  other pages.

![Card sorting project3 update](card_sorting_3.jpg "Card sorting project 3 update")
Since milestone 1, I have decided to remove the recruiting schedule page and transfer the content over the the Recruiting page. This makes the site easier to navigate and find information, as all the recruiting central info is on the same page.

![New Recruiting Page](sketchRecruitingnew.jpg "Updated Recruiting Page")
The recruiting page now has the tournament schedule the coaches will be recruiting at. Everything else is the same, including the form feedback, confirmation, etc.

![Gallery sketch 1](SketchGallery1.jpg "First gallery page sketch")
This is my initial plan for the gallery. I will need to all the new page to the navigation bar. I plan to style the gallery by having three images a row all displayed in the square format. Underneath each photo is a description you can put in when you upload the photo. On the top left above the photos you have the option to upload a post, and on the top right you have the option to search for a certain hashtag. Each image has the option to delete in the upper left corner.

![Gallery sketch 2](sketchgallery2.jpg "Updated Gallery sketch")
Upon review of the project guidelines, I plan to add some extra attributes to the gallery page. Instead of just an upload a post link, I want to display a mini form in the top left corner. Here the user will be able to upload an image, caption it, select previously used hashtags, add a new hashtag and then post. I want to implement the previously/popular hashtags as checkboxes the user can click and apply. Also, I have decided not to have the x to delete the image on the main gallery page, instead this option will be available when the user clicks on the image.

![Gallery sketch 3](SketchGallery3.jpg "Updated Gallery sketch") As I have been working on this project, I have decided that It is not aesthetically appealing to have the entire upload form displayed in the corner. So I want to implement this improved design to follow common design principles for other galleries. So I Want to make the page look like this when the user first clicks the gallery tag and sees the gallery. Also, in order to show that is a button, I want to make it get lighter when the user hovers over it.

![Gallery sketch 4](sketchGallery4.jpg "Gallery with upload form sketch")
This is what I want the new design to look like when the user presses the upload arrow in the top left corner. When the arrow is pressed the form inputs should display below it. These inputs are the same as the previous sketches, except I want to but the popular hashtag checkboxes vertically aligned to follow visual design principles. Additionally, if the user clicks the arrow again, the form will hide and it will go back to looking like the previous sketch. I want to implement this because it also follows common design principles. Additionally, the gallery underneath the form just moves down when the form is displayed so the user can still scroll down and look at the photos. Then once the user adds a post, it should display at the bottom of the gallery, and then the form go back to being hidden.




![Selected image from the gallery](galleryselected.jpg "User has selected an image from the gallery to view")
This is what I want to make the page look like when the user selects an image to view. It should go to another page and diplay the image large. Underneath the image should be all the info about it, such as caption, name, and hashtags. Then I want to add a button to the top right corner of the image the give the user options they can do with the photo. I plan to make a dropdown list when the user hovers over the button, with the options to delete the post, add a tag, or remove a tag. I have yet to decide what happens when the user clicks add or delete a tag. I am contemplating doing some sort of popup input.

![Selected image from the gallery](galleryselected2.jpg "User has selected an image from the gallery to view")
Having implemented the single photo view of the sketch above, I have decided I need to make a few changes. I want to format the image, caption, image name, and hashtags like a post, so I want to apply similar formatting to the way it is displayed in the gallery. So i Will add the border around the image info and have a slightly different background color so it will look like a post, and follow common design practices. Additionally, I plan to change the drop down menu to only include the delete option. If the delete option is selected, it should take you back to the main gallery. I changed the dropdown menu because I believe it will be much more user friendly to have the edit tag info by the tags. It is more logical to have the tags listed, then after the last comma, I want to have a text box that lets you type a tag followed by an "add tag" button that adds the tag to the image. Then next to those inputs I want there to be a dropdown list of the current tags with a delete tag button next to it. This design seems more logical for a user, and will therefore improve the user experience.


## Design Patterns (Milestone 1)
> Explain how your site leverages existing design patterns for image galleries.
> Identify the parts of your design that leverage existing design patterns and justify their usage.
> Most of your site should leverage existing patterns. If not, fully explain why your design is a special case (you need to have a very good reason here to receive full credit).

My site leverages existing design patters by displaying them with the three photos per row. This is used by instagram, TikTok, and even Cornell Athletics. Additionally, it is common design practice to have the photo description under neath the photo, as well as having the delete option in the upper left corner when viewing a single photo. I also planned to format the search in the upper right corner as is customary for many image galleries. The upload arrow in the upper left corner is also a very common existing design patter, as it minimizes the amount of buttons/inputs displayed on the screen. Additionally, many galleries such as instagram, google photos, and Cornell Athletics, change the opacity of the photo when you hover over it. This lets users know they can click on them to view more information. Also, when viewing a single page, having the image displayed with the post information below and all surrounded by a border and having a slightly different background color behind the information is a customary practice. By utilizing this, it makes the user feel more personally connected to the volleyball program. Rather than random images with descriptions, following these practices that are cutomary on social media sites, blogs, etc. make the posts feel like an update from a team member or alumni, rather than a random picture of the team with no context.


## Requests (Milestone 1)
> Identify and plan each request you will support in your design.
> List each request that you will need (e.g. view image details, view gallery, etc.)
> For each request, specify the request type (GET or POST), how you will initiate the request: (form or query string param URL), and the HTTP parameters necessary for the request.

- Request: View certain hashtag
  - type: GET
  - form
  - params: id and tag field, images.tag
- Request: delete photo
  - type: POST
  - form
  - params: id
- Request:uploading an image
  - type: POST
  - form
  - params: id, descr, the image file needed
- Request: adding an existing tag to an image
    - Post
    - form
    - tag id, image id
- Request: removing a tag from an image
    - POST
    - form
    - tag id, image id
- Request: adding a new tag to an image
    - POST
    - form
    - tag name, image id
- Request: view a single image and its details
    - GET
    - query string param URL
    - photo id


## Database Schema Design (Milestone 1)
> Plan the structure of your database. You may use words or a picture.
> Make sure you include constraints for each field.

> Hint: You probably need `images`, `tags`, and `image_tags` tables.

> Hint: For foreign keys, use the singular name of the table + _id. For example: `image_id` and `tag_id` for the `image_tags` table.


```
images(
    id: INTEGER {PK, U, Not, AI},
    file_ext: TEXT NOT NULL,
    image_name: TEXT NOT NULL,
    descr: TEXT NOT NULL,
    source: TEXT
)
tags(
    id: INTEGER {PK, U, Not, AI},
    tag_name: TEXT{U, Not}
)
image_tags(
    id: INTEGER {PK, U, Not, AI},
    image_id: INTEGER{Not},
    tag_id: INTEGER{Not}
)
```


## Database Query Plan (Milestone 1)
> Plan your database queries. You may use natural language, pseudocode, or SQL.
> Using your request plan above, plan all of the queries you need.

Query to view a certain hashtag:

SELECT images.id, images.file_ext, images.description, images.image_name, images.source FROM images INNER JOIN image_tags ON image_tags.image_id=images.id INNER JOIN tags ON image_tags.tag_id=tags.id WHERE tags.tag_name="certin hashtag"

Query to delete a photo:

DELETE FROM images WHERE images.id="*selected deleted photo id*";

Query to upload an image:

INSERT INTO images (descr, file_ext, image_name) VALUES ('____');

Query to add an existing tag to an image:

$added_tag="tag to be added"; $image_id
$added_ids= "SELECT tags.id FROM tags WHERE tags.tag_name=$added_tag;";
INSERT INTO image_tags (image_id, tag_id) VALUES ($image_id, $added_ids);

Query to remove a tag from an image:

DELETE FROM image_tags WHERE image_id=*image id* AND tag_id=*tag_id*

Query to add a new tag to an image:

INSERT INTO tags (tag_name) VALUES ('something');
//get the ids of the image and tag;
INSERT INTO image_tags (image_id, tag_id) VALUES (x,y);

## Code Planning (Milestone 1)
> Plan what top level PHP pages you'll need.
So far I plan to have Home, Contact, Game and Events Schedule, Recruiting, Recruiting Schedule, Donations, Community Outreach, and Gallery. However, I am still considering condensing/delete a few pages.

Since writing this, I have decided to condense the recruitin and rescruiting schedule pages into just the rescruiting page.

> Plan what partials you'll need.
I need a header, footer, and nav bar partial to show which current page I am on.


> Plan any PHP code you'll need.

on each page:
```
include("includes/init.php");
include("inclues/header.php");
include("includes/footer.php");
```
inside the header for the navbar:
```
<li class="<?php echo $pageIndex ?>"><a href="index.php">Home</a></li>
<li class="<?php echo $pageContact ?>"><a href="contact.php">Contact</a></li>
<li class="<?php echo $pageRecruiting ?>"><a href="recruiting.php">Recruiting</a></li>
<li class="<?php echo $pageSchedule ?>"><a href="schedule.php">Recruiting Schedule</a></li>
<li class="<?php echo $pageDonations ?>"><a href="donations.php">Donations</a></li>
<li class="<?php echo $pageGameSchedule ?>"><a href="gameschedule.php">Game and Events Schedule</a></li>
<li class="<?php echo $pageOutreach ?>"><a href="outreach.php">Community Outreach</a></li>
```

On each top level PHP page:
```
$pageDonations = "border"; etc..
```
Form information/conditionals
```
if(isset($_POST['forms'])){
    filter variables
    get information from the forms
}
```
Form Feedback
```
if($validForm){
    display normal content
}else{
    display feedback
}
```
cycling through images when displaying the gallery
```
$results of sql query
foreach($results as $result){
    display each image
}
```



# Complete & Polished Website (Final Submission)

## Gallery Step-by-Step Instructions (Final Submission)
> Write step-by-step instructions for the graders.
> For each set of instructions, assume the grader is starting from index.php.

Viewing all images in your gallery:
1. Go to the gallery.php page
2. All images are diplayed

View all images for a tag:
1. Go to the gallery.php page
2. Go to the filter by hashtag list in the top right corner
3. Select the hashtag you want to filter by
4. Press the search button

View a single image and all the tags for that image:
1. Go to gallery.php page
2. Click the image you want to inspect
3. Once you are taken to a new page, the tags will be displayed underneath the photo

How to upload a new image:
1. Go to the gallery.php page
2. Double click the upload arrow in the top left
3. Dlick the "upload an image" button to select an image from your files
4. Add a caption
5. Delect popular hashtags, and enter a new tag (all optional)
6. Click the post button
7. Image should be displayed at the bottom of the gallery

How to delete an image:
1. Go to gallery.php page
2. Click the image you want to delete
3. When you are taken to a new page, hover over the button in the top right corner with the three dots
4. When the option to delete appears in a dropdown menu, click it
5. The post will be deleted and you will be taken back to the gallery.php page

How to view all tags at once:
1. Go to gallery.php page
2. Click the dropdown list in the filter by hashtag option, all the tags there are all the currenly used hashtags

How to add a tag to an existing image:
1. Go to the gallery.php page
2. Click the image you want to add the tag to
3. Go to the details below the image
4. Type in the textbox listed after the hashtags the tag you want to add
5. Click the "Add Tag" button after it
6. New tag will appear

How to remove a tag from an existing image:
1. Go to the gallery.php page
2. Click the image you want to edit
3. Go to the details below the image
4. Select from the dropdown list which tag you wish to delte
5. Click the "Delete Tag" button
6. The tag has been removed


## Reflection (Final Submission)
> Take this time to reflect on what you learned during this assignment. How have you improved since starting this class?

During this assignment I have improved my ability to come up with sql queries dramatically. It used to take me a long time to reason through the logic of getting the specific data, but I am now able to produce complicated and accurate queries efficiently when needed. I have learned so much since the begging of this class. I came in having never taken 1300, so I was really starting from scratch. I feel confident in my HTML, CSS, PHP, and even JavaScript skill now, whereas before I literally did not now how to do a single thing. I have also greatly improved my debugging skills (especially since we are learning remotely and office hours are not as easy to get lots of help at). This has been helpful in other CS classes I have taken and saved me lots of time. Overall, I am very glad I took this class, as I have gained so many new skills and even improved the computer science skill I already had. I have also really enjoyed learning about this subject, as it is so applicable in every realm of life.
