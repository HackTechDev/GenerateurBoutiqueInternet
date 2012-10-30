#!/bin/sh

find . -name "*.xml" -print | xargs sed -i 's/posts/logiciels/g'
find . -name "*.xml" -print | xargs sed -i 's/Posts/Logiciels/g'
find . -name "*.xml" -print | xargs sed -i 's/post/logiciel/g'
find . -name "*.xml" -print | xargs sed -i 's/Post/Logiciel/g'

find . -name "*.xml" -print | xargs sed -i 's/comments/extensions/g'
find . -name "*.xml" -print | xargs sed -i 's/Comments/Extensions/g'
find . -name "*.xml" -print | xargs sed -i 's/comment/extension/g'
find . -name "*.xml" -print | xargs sed -i 's/Comment/Extension/g'

