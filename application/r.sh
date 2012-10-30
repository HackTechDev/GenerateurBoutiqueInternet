#!/bin/sh

find . -name "*.php" -print | xargs sed -i 's/posts/logiciels/g'
find . -name "*.php" -print | xargs sed -i 's/Posts/Logiciels/g'
find . -name "*.php" -print | xargs sed -i 's/post/logiciel/g'
find . -name "*.php" -print | xargs sed -i 's/Post/Logiciel/g'

find . -name "*.php" -print | xargs sed -i 's/comments/extensions/g'
find . -name "*.php" -print | xargs sed -i 's/Comments/Extensions/g'
find . -name "*.php" -print | xargs sed -i 's/comment/extension/g'
find . -name "*.php" -print | xargs sed -i 's/Comment/Extension/g'

find . -name "*.phtml" -print | xargs sed -i 's/posts/logiciels/g'
find . -name "*.phtml" -print | xargs sed -i 's/Posts/Logiciels/g'
find . -name "*.phtml" -print | xargs sed -i 's/post/logiciel/g'
find . -name "*.phtml" -print | xargs sed -i 's/Post/Logiciel/g'

find . -name "*.phtml" -print | xargs sed -i 's/comments/extensions/g'
find . -name "*.phtml" -print | xargs sed -i 's/Comments/Extensions/g'
find . -name "*.phtml" -print | xargs sed -i 's/comment/extension/g'
find . -name "*.phtml" -print | xargs sed -i 's/Comment/Extension/g'

