# Goff Family DNA Web Application

##Front end
Upon initial load, the user is taken to a home page that lists out all of the family tree branches in the database along with a brief user-created descriptor of the DNA project. After selecting a family, the page pulls up a table of all DNA testing kits in the family, along with a brief description of the history and research on this family tree.

The data retrieved is formatted into a table, and then re-formatted using the DataTables jQuery plugin. This allows the data to be sorted and searched. The "reference" ancestor is shown at the top of the table, this ancestor is accepted as the most recent common ancestor shared by all descendants in the selected family branch. Chromosome mutations are highlighted in each descendant test kit to show deviations from the common ancestor.

##Back end
The back end is a simple implementation of the php-login project. It allows the user to update the front page content, add/edit/delete DNA kits, and add/edit/delete families in the database.

All data is handled with an SQL database.

###Link
The project can be found at:

[Goff Family DNA Project](http://dna.alexgoff.net/)
