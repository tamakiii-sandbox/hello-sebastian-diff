.PHONY: all main git

run: \
	main \
	git

main:
	php src/main.php

git:
	php src/git.php
