#G17 Question 4

class Vertex:                                                     
 
  def __init__(self,vertexNo,latude,lotude):             
    self.vertexNo = vertexNo                                    
    self.latude = latude                               
    self.lotude = lotude                              
        
class Graph:                                            
  
  def __init__(self,vertx):                             
    self.gh=[]                                    
    self.vx=vertx                                   

  def search(self,j,ancestor):             #recursively check node is previously add to ancestor array
    if(ancestor[j])!=j: return self.search(ancestor[j],ancestor)
    else : return j

  def join(self,p,q,que,ancestor):         #using join method done sorting and creating priority queue 
   
    aa=self.search(p,ancestor)             # aa is root of p
    bb=self.search(q,ancestor)             # bb is root of q 
        
    if(que[aa]>que[bb]):                   #sorting part done using if elif and else conditions
       ancestor[bb]=aa
    
    elif(que[aa]<que[bb]):
      ancestor[aa]=bb

    else:
       ancestor[bb]=aa
       que[aa]=que[aa]+1

  def Mst_find(self):
   
    self.gh=sorted(self.gh,key=lambda item: item[2])   # sorted graph according to the distance 
    ancestor = []
    que = []                                           # que array store vertices acccording to priority  
    ans=[]                                             # final result of minimum spanning tree store ans array
    j,vertexNo = 0,0

    for vertx in range(self.vx):
      ancestor.append(vertx)
      que.append(0)
        
    while(vertexNo<self.vx-1) :
        p,q,r=self.gh[j]                               #p,q,r are source node end node and weight node
        j=j+1
        m=self.search(p.vertexNo,ancestor)              
        n=self.search(q.vertexNo,ancestor)

        if(m!=n):
          vertexNo=vertexNo+1
          ans.append([p,q])
          self.join(m,n,que,ancestor)
        
    print(len(ans))
    ans.reverse()                                                 #minimum spanning tree final result reverse to get the output as pdf    
    for x, y in ans:
        print(x.vertexNo+1,y.vertexNo+1)

  def addEdge(self,x,y):                                          # x is source node and y is destination node
    z = ((x.lotude-y.lotude)**2 +(x.latude-y.latude)**2)**0.5     # weight calculated using pythagoras formula and assign to variable z 
    self.gh.append([x,y,z])                                       # x,y,z values append gh array 

node=[]
I=int(input())                                                    #get user input and covert it to int and assingn it to varable I
pp=Graph(I)                                                        

for j in range(I):
   lotude, latude = map(float, input().split())                   #input split according to space and  using map function each string element convert to float 
                                                                  #then return a list and destructure it 
   node.append(Vertex(j,latude,lotude))                           #appends nodes to vertex array 
  
for x in range(I):
  for y in range(x+1,I):
    pp.addEdge(node[x],node[y])
        
print("\nOutput:")        
pp.Mst_find()








