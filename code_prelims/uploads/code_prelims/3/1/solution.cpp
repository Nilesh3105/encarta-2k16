#include<iostream>
#include<string.h>
using namespace std;
int main(){
	int t,i,count[26]={0},removed_char;
	string str; 
	cin>>t;
	while(t--){
		removed_char=0;
		cin>>str;
		i=0;
		int length = str.length();
		while(i<length){
			count[str[i++]-97]++;
		}
		for(int i=0;i<26;i++){
		  	if(count[i]%2!=0)
		  	  removed_char++;
		}
		if(removed_char>=1)
		  cout<<removed_char-1<<endl;
		else
		  cout<<removed_char<<endl;  
	}
}
