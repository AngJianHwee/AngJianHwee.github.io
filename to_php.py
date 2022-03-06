import os
import to_html

if __name__ == '__main__':

    print(len(to_html.getFileEndswith()))
    # os.chdir(r"D:\04_File\02_Programming\11_Heroku\angjianhwee")

    for y in [x for x in os.listdir() if x.endswith(".html")]:
        os.rename(y, y[:y.find(".html")]+".php")
