#include<iostream>
using namespace std;

int main()
{
int t,n,a[100],i,k,j=0;
 long int sum,b[1000],max;
 cin>>t;
 while(t--){
      cin>>n;
      for(i=0;i<n;i++)
       cin>>a[i];
      for(i=0;i<n;i++)
      {  k=i;sum=0;
         while(k<n)
        {
          sum+=a[k];
          b[j++]=sum;
          k++;
        } 
      }
      max=b[0];
      for(k=1;k<j-1;k++)
     {  
       if(b[k]>max)
        max=b[k];
     }
  cout<<max<<endl;
  	
 }
    
  
  return 0;
}  

