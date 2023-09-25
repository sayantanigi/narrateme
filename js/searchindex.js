// search index for WYSIWYG Web Builder
var database_length = 0;

function SearchPage(url, title, keywords, description)
{
   this.url = url;
   this.title = title;
   this.keywords = keywords;
   this.description = description;
   return this;
}

function SearchDatabase()
{
   database_length = 0;
   this[database_length++] = new SearchPage("index.html", "Untitled Page", "untitled page log in nbsp register sign up home about us members individuals students educational institutions instructional facilities amp schools contact me gallery blog links narrateme aenean nulla dui sagittis ac magna aliquam feugiat nullam sed bibendum urna create your story lorem ipsum dolor sit amet consectetur adipiscing elit suspendisse sem quam porttitor id sagittiseget cursus mauris lobortis neque life transcript distance learning instruction top stories nam enim eros accumsan venenatis pretium non interdum et malesuada fames ante primis faucibus we are social copyright all right researved designed developed by goigi com times login to account or ", "");
   return this;
}
