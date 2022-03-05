import os


def getFileEndswith(endswith="html", path="."):

    def _getFileEndswith(endswith, path, arr):
        # print(os.path.abspath(os.listdir(path)[0]))
        arr.extend([os.path.abspath(x)
                    for x in os.listdir(path) if x.endswith(endswith)])
        for x in os.listdir(path):
            if os.path.isdir(x):
                _getFileEndswith(endswith, x, arr)
        return arr

    arr = []
    arr = _getFileEndswith(endswith, path, arr)
    print(arr)
    return arr

if __name__ == "__main__":
	print(len(getFileEndswith(".php")))
	
	for y in [x for x in os.listdir() if x.endswith(".php")]:
	    os.rename(y, y[:y.find(".php")]+".html")
