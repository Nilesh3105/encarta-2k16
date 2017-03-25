#include<iostream>
using namespace std;

int sum_of_digits(int num){
	int sum=0;
	while(num){
		sum=sum+num%10;
		num=num/10;
	}
	if(sum>10)  return sum_of_digits(sum);
	else   
	return sum;
	
}
int main(){
	int t,L,R,K,Lsum_digit,Rsum_digit,count;
	cin>>t;
	while(t--){
		cin>>L>>R>>K;
		Lsum_digit=sum_of_digits(L);
		Rsum_digit=sum_of_digits(R);
		count=(R-L)/9;
		if(K>Lsum_digit  && K<=Rsum_digit)
		  count++;
		cout<<count<<endl;  
	}
} 
