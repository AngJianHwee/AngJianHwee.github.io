import os
import to_html

if __name__ == '__main__':

    print(len(to_html.getFileEndswith()))

    for y in [x for x in os.listdir() if x.endswith(".html")]:
        os.rename(y, y[:y.find(".html")]+".php")
