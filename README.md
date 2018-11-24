# AfterLife Features
Fully featured kill/death scoring plugin plus custom death event

 - [x] Score points on Kill! `(+ gain xp)`
 - [x] Losse xp on Death!
 - [x] Calculates kill/death ratio 
 - [x] Level up when acheved spesified amount of XP `(see config)`
 - [x] Commands to see your or another players' stats `(suports formAPI)`
 - [x] Enable floating texts to see leaderboard of stats `(see commands)`
 - [ ] Add commands to easialy change settings in config
 
# Custom Event
The custom event is simple, it disables the title screen to prevent accedendal quit to menu ;)
```yml
# config.yml
#choose between 'custom' or 'default'
death-method: "custom"
```
# Commands
```yml
stats: 
    description: "Shows PvP Stats '/stats or /stats <player>'"
    
setleaderboard: 
    description: setsleader board that displays player stats (floating texts)
```
