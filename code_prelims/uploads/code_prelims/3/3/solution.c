#include <stdio.h>
int max(int x,int y)
{
    if(x>y)
        return x;
    return y;
}

int main() 
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
        int n;
        scanf("%d",&n);
        int a[n];
        for(int i=0;i<n;i++)
            scanf("%d",&a[i]);
        int max_c=a[0],max_t=a[0];
        for(int i=1;i<n;i++)
        {
            max_t = max(a[i],max_t+a[i]);
            max_c = max(max_c,max_t);
        }
        printf("%d\n",max_c);           
    }
    return 0;
}
