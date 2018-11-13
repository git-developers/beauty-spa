NOW := $(shell /bin/date "+%Y-%m-%d . %H:%M:%S")
AUTHOR_EMAIL := "josetue@outlook.com"
AUTHOR_NAME := "Tianos"
HOST_PROJECT := http://griselbeautyspa.com
DATABASE_NAME := beauty_spa
BRANCH_NAME := master

save:
	git add .
	git config --global user.email $(AUTHOR_EMAIL)
	git config --global user.name $(AUTHOR_NAME) --replace-all
	git commit -m "Tianos said -> modifications made on: $(NOW)"
	git push github $(BRANCH_NAME)


