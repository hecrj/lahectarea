all: css

css:
	lessc --yui-compress less/lahectarea.less static/css/main.css

clean:
	sudo rm -rf cache/*/*