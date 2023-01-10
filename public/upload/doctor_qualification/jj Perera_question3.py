#20000596 - Gineth Karunanayake [G 17]
from collections import Counter
from itertools import count

#creating the huffman tree
class Node(object):
    def __init__(self, left=None, right=None):
        self.left = left
        self.right = right

    def children(self):
        return self.left, self.right

    def __str__(self):
        return self.left, self.right

#updating huffman code segment
def huffTree(node, cha=''):
   
    if type(node) is str:
        return {node: cha}
    (l, r) = node.children()
    ch = dict()
    ch.update(huffTree(l, cha + '0'))
    ch.update(huffTree(r, cha + '1'))
    return ch

def code(nodes):
#creating code for each character in the statement
    while len(nodes) > 1:
        (key1, c1) = nodes[-1]
        (key2, c2) = nodes[-2]
        nodes = nodes[:-2]
        node = Node(key1, key2)
        nodes.append((node, c1 + c2))

        nodes = sorted(nodes, key=lambda i: i[1], reverse=True)

    return nodes[0][0]

#count of each character including spaces
def countCharacters(name): 
     count = 0
     for i in name:
         if (i == ' '):
             count +=1
         else:
              count +=1
     return count


if __name__ == '__main__':
   count =0
   #promt user to enter a string by console
   name = str(input("\nEnter the Statement  : "))
   freq = dict(Counter(name))
   freq = sorted(freq.items(), key=lambda x: x[1], reverse=True)
   node = code(freq)
   encoding = huffTree(node)
   
   print('\nHuffman Codes of characters\n')
  
   for i in encoding:
        count +=1
        
        if( i == ' '):
             print(f'space   -  {encoding[i]} ')
        else:
            print(f'  {i}    -  {encoding[i]} ')
   encodedOutput = []
  
   for i in name:
        encodedOutput.append(encoding[i])  
        string_1 =  ''.join([str(item) for item in encodedOutput])
 #join the code together  to from the encoded  message
        string = ' '.join([str(item) for item in encodedOutput])
        
   print('\n\nEncoded message:\n ')
   print(string)   

   num = countCharacters(name)
 #print the final result  num of bits needed and no of  spaces  save because of  huffman code
   print("\nTotal count of the statement : ", num)
   print("Space consumed before Compression in bits :", num*8)
#find the length of the encoded message and print it
   print("Space consumed after Compression in bits : " , len(string_1))
#get the difference of bits 
   print("Difference Between Before and After : ", num*8 - len(string_1) )
   print('')