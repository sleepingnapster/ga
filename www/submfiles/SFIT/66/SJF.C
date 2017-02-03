#include<stdio.h>
#include<conio.h>
int main()
{
int time,bt[10],at[10],sum_bt,smallest,n,i;
int sum_turnaround=0,sum_wait=0;
clrscr();
printf("Enter no of processes:");
scanf("%d",&n);
for(i=0;i<n;i++)
{
 printf("enter the arrival time and burst time of %d process:",i+1);
 scanf("%d%d",&at[i],&bt[i]);
 sum_bt+=bt[i];
 }
 bt[9]=9999;
 printf("\n\n process\tturnaround time\twaiting time\n\n");
 for(time=0;time<sum_bt;)
 {
 smallest =9;
 for(i=0;i<n;i++)
 {
 if(at[i]<=time && bt[i]>0 && bt[i]<bt[smallest])
 smallest=i;
 }
 if(smallest==9)
 {
 time++;
 continue;
 }
 printf("p[%d]\t\t%d\t\t%d\n",smallest+1,time+bt[smallest]-at[smallest],time-at[smallest]);
 sum_turnaround+=time+bt[smallest]-at[smallest];
 sum_wait+=time-at[smallest];
 time+=bt[smallest];
 bt[smallest]=0;
 }
 printf("\n\n average waiting time=%f",sum_wait*1.0/n);
 printf("\n\n average turnaround time=%f",sum_turnaround*1.0/n);
getch();
 }
