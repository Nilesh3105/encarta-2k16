#include <iostream>
#include <algorithm>
#include <vector>
#include <cstring>
#define FAST_IO ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL)
#define MOD 1000000007
#define MAXN 100000
#define gcd __gcd
using namespace std;

//long long s[4*MAXN];
long long a[MAXN+1];
int main()
{
	int n, m;
	cin>>n>>m;
	for(int i=1;i<=n;i++)
		cin>>a[i];
	for(int i=0;i<m;i++)
	{
		int t;
		cin>>t;
		if(t==1)
		{
			long long p, x;
			cin>>p>>x;
			a[p]=x;
		}
		else if(t==2)
		{
			int i;
			long long s;
			cin>>s;
			long long sum=0;
			for(i=1;i<=n;i++)
			{
				sum += a[i];
				if(sum>=s)
					break;
			}
			if(sum==s)
			{
				cout<<"Found "<<i<<"\n";
			}
			else
				cout<<"Not Found\n";
		}
	}
	return 0;
}
