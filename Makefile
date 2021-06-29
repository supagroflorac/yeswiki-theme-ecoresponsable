SHELL := bash

.DEFAULT_GOAL := build

RELEASE_DIR := releases
INPUT_SCSS := "scss/default.scss"
OUTPUT_CSS := "styles/ecoresponsable.css"

build:
	@printf "Building CSS...\n"
	@sass --style=compact ${INPUT_SCSS}:${OUTPUT_CSS}

pull:
	@git pull

update: pull build

dev:
	@sass --watch ${INPUT_SCSS}:${OUTPUT_CSS}

release: build
	@printf "Building release...\n"
	@ if [ ! -d "${RELEASE_DIR}" ]; then \
		mkdir -p "${RELEASE_DIR}"; \
	fi
	@tar czf releases/yeswiki-theme-ecoresponsable-`date +"%Y%m%d"`.tgz \
	--exclude='.[^/]*' \
	--exclude="releases" \
	--exclude="scss" \
	--exclude="README.md" \
	--exclude="Makefile" \
	. \
	--transform 's/^./ecoresponsable/'

clean:
	@printf "Cleaning styles...\n"
	@rm styles/*
	@rm -r .sass-cache


help:
	@printf "Usage make [release|dev|build|clean|update|help]\n"