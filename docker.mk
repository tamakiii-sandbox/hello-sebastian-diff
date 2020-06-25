.PHONY: help install build bash clean

NAME := hello-sebastian-diff

help:
	@cat $(firstword $(MAKEFILE_LIST))

install: \
	build

build:
	docker build -t $(NAME) .

bash:
	docker run -it --rm -w /work -v $$(pwd):/work $(NAME) $@

clean:
	docker image rm $(NAME)
