#include <iostream>
using namespace std;
int main() 
{
    int t;
    cin>>t;
    while(t--)
    {
        int l, r, k;
        cin>>l>>r>>k;
        int ans = 0;
        for(int i=l;i<=r;i++)
        {
            if( (1 + (i-1)%9) == k )
                ans++;
        }
        cout<<ans<<"\n";
    }
    return 0;
}
