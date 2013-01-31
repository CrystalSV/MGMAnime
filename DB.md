DB MGM Anime
============

This is the structure of the Entities in the MGM Anime DB


catNews
-------

- id
- Title
- Content
- Date
- Keywords
- idCategory
- idUser
-

catCategories
-------------

- id
- Name

ctrBreakingNews
---------------

- id
- imagePath
- idNew

ctrMultimedia
-------------

- id
- path
- idNew
- type

ctrAccess
---------

- id
- idUser

catUsers
-------

- id
- userName
- mail
- pass
- signature
- gender
- age
- Ocupations
- hobbies
- birthday
- website
- idAvatar

ctrAvatars
----------

- id
- type
- path


Relations
=========

catNews - catCategories (A category can has many news)
catNews - catUsers (An user can write many news)
catNews - ctrBreakingNews (A new can be a breaking new)
catNews - ctrMultimedia (A new can has many multimedia files)
ctrAcces - catUser (An acces can be aproved to a user)
catusers - ctrAvatars (An user can has an avatar)