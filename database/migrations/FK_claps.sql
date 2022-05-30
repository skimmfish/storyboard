/*ALTER TABLE claps
add  constraint Fk_post_id foreign key(post_id)
references contents(id);
*/

ALTER TABLE claps
ADD FOREIGN KEY(post_id)
REFERENCES contents(id);
