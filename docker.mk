.PHONY: help install build bash clean

NAME := hello-sebastian-diff
WORKDIR := /work
VOLUMES := $$(pwd):$(WORKDIR) ~/.composer:/root/.composer

help:
	@cat $(firstword $(MAKEFILE_LIST))

install: \
	build

build:
	docker build -t $(NAME) .

bash:
	docker run -it --rm -w $(WORKDIR) $(foreach v,$(VOLUMES),-v $v) $(NAME) $@

clean:
	docker image rm $(NAME)
